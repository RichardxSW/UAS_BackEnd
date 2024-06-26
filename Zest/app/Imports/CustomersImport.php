<?php

namespace App\Imports;

use App\Models\customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomersImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Customer([
            'id' => $row['id'],
            'nama_customer' => $row['name'],
            'address_customer' => $row['address'],
            'email_customer' => $row['email'],
            'contact_customer' => $row['contact'],
        ]);
    }
}