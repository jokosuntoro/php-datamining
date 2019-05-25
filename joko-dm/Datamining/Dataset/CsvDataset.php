<?php

declare(strict_types=1);

namespace jokodm\Datamining\Dataset;

class CsvDataset extends ArrayDataset
{
    /**
     * @var array
     */
    protected $columnNames = [];

    /**
     * @throws FileException
     */
    public function __construct(string $filepath, int $features, bool $headingRow = true, string $delimiter = ',', int $maxLineLength = 0)
    {
        $handle = fopen($filepath, 'rb');
        if ($handle === false) {
            throw FileException::cantOpenFile(basename($filepath));
        }

        if ($headingRow) {
            $data = fgetcsv($handle, $maxLineLength, $delimiter);
            $this->columnNames = array_slice($data, 0, $features);
        } else {
            $this->columnNames = range(0, $features - 1);
        }

        $samples = $targets = [];
        while (($data = fgetcsv($handle, $maxLineLength, $delimiter)) !== false) {
            $samples[] = array_slice($data, 0, $features);
            $targets[] = $data[$features];
        }

        fclose($handle);

        parent::__construct($samples, $targets);
    }

    public function getColumnNames(): array
    {
        return $this->columnNames;
    }
}
