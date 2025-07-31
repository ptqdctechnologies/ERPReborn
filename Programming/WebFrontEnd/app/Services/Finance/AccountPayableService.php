<?php

namespace App\Services\Finance;

use Carbon\Carbon;
use Exception;

class AccountPayableService
{
    public function summaryReport($project, $site, $supplier, $date): mixed
    {
        if ($date) {
            $dates      = explode(' - ', $date);
            $startDate  = Carbon::createFromFormat('m/d/Y', trim($dates[0]))->startOfDay();
            $endDate    = Carbon::createFromFormat('m/d/Y', trim($dates[1]))->endOfDay();
        }

        $dummyData = [
            [
                'number'                => 'AP/QDC/2025/000157',
                'date'                  => '2025-07-25',
                'sub_budget'            => '240 - Cendana Andalas',
                'supplier'              => 'VDR0006 - Alumagada Jaya Mandiri',
                'total_idr'             => 1500000,
                'total_other_currency'  => 0,
                'total_equivalent_idr'  => 1500000,
                'tax_invoice_number'    => 'INV/QDC/2025/000177',
                'submitter'             => 'Aden Bagus',
                'status'                => 'Final Approval',
                'project_id'            => '46000000000033',
                'site_id'               => '143000000000307',
                'supplier_id'           => '126000000000004',
            ],
            [
                'number'                => 'AP/QDC/2025/000158',
                'date'                  => '2025-07-26',
                'sub_budget'            => '235 - Bukit Pakis Sby Infill',
                'supplier'              => 'VDR0005 - Alpine Cool Utama',
                'total_idr'             => 1400000,
                'total_other_currency'  => 0,
                'total_equivalent_idr'  => 1400000,
                'tax_invoice_number'    => 'INV/QDC/2025/000178',
                'submitter'             => 'Abdul Rachman',
                'status'                => 'Ongoing',
                'project_id'            => '46000000000033',
                'site_id'               => '143000000000305',
                'supplier_id'           => '126000000000003',
            ],
            [
                'number'                => 'AP/QDC/2025/000159',
                'date'                  => '2025-07-27',
                'sub_budget'            => '235 - Bukit Pakis Sby Infill',
                'supplier'              => 'VDR0005 - Alpine Cool Utama',
                'total_idr'             => 1250000,
                'total_other_currency'  => 0,
                'total_equivalent_idr'  => 1250000,
                'tax_invoice_number'    => 'INV/QDC/2025/000179',
                'submitter'             => 'Ahmad Choerul',
                'status'                => 'Ongoing',
                'project_id'            => '46000000000033',
                'site_id'               => '143000000000305',
                'supplier_id'           => '126000000000003',
            ],
            [
                'number'                => 'AP/QDC/2025/000160',
                'date'                  => '2025-07-28',
                'sub_budget'            => '235 - Bukit Pakis Sby Infill',
                'supplier'              => 'VDR0005 - Alpine Cool Utama',
                'total_idr'             => 980000,
                'total_other_currency'  => 0,
                'total_equivalent_idr'  => 980000,
                'tax_invoice_number'    => 'INV/QDC/2025/000180',
                'submitter'             => 'Agus Salim',
                'status'                => 'Final Approval',
                'project_id'            => '46000000000033',
                'site_id'               => '143000000000305',
                'supplier_id'           => '126000000000003',
            ],
            [
                'number'                => 'AP/QDC/2025/000161',
                'date'                  => '2025-07-29',
                'sub_budget'            => '240 - Cendana Andalas',
                'supplier'              => 'VDR0006 - Alumagada Jaya Mandiri',
                'total_idr'             => 3100000,
                'total_other_currency'  => 0,
                'total_equivalent_idr'  => 3100000,
                'tax_invoice_number'    => 'INV/QDC/2025/000181',
                'submitter'             => 'Andri Andriyan',
                'status'                => 'Final Approval',
                'project_id'            => '46000000000033',
                'site_id'               => '143000000000307',
                'supplier_id'           => '126000000000004',
            ],
            [
                'number'                => 'AP/QDC/2025/000162',
                'date'                  => '2025-07-30',
                'sub_budget'            => '235 - Bukit Pakis Sby Infill',
                'supplier'              => 'VDR0005 - Alpine Cool Utama',
                'total_idr'             => 2000000,
                'total_other_currency'  => 0,
                'total_equivalent_idr'  => 2000000,
                'tax_invoice_number'    => 'INV/QDC/2025/000182',
                'submitter'             => 'Fitriastuti Kurnia',
                'status'                => 'Ongoing',
                'project_id'            => '46000000000033',
                'site_id'               => '143000000000305',
                'supplier_id'           => '126000000000003',
            ],
            [
                'number'                => 'AP/QDC/2025/000163',
                'date'                  => '2025-07-31',
                'sub_budget'            => '240 - Cendana Andalas',
                'supplier'              => 'VDR0006 - Alumagada Jaya Mandiri',
                'total_idr'             => 1750000,
                'total_other_currency'  => 0,
                'total_equivalent_idr'  => 1750000,
                'tax_invoice_number'    => 'INV/QDC/2025/000183',
                'submitter'             => 'Gunawan',
                'status'                => 'Final Approval',
                'project_id'            => '46000000000033',
                'site_id'               => '143000000000307',
                'supplier_id'           => '126000000000004',
            ],
            [
                'number'                => 'AP/QDC/2025/000164',
                'date'                  => '2025-08-01',
                'sub_budget'            => '235 - Bukit Pakis Sby Infill',
                'supplier'              => 'VDR0005 - Alpine Cool Utama',
                'total_idr'             => 1000000,
                'total_other_currency'  => 0,
                'total_equivalent_idr'  => 1000000,
                'tax_invoice_number'    => 'INV/QDC/2025/000184',
                'submitter'             => 'Leonardo Putra',
                'status'                => 'Ongoing',
                'project_id'            => '46000000000033',
                'site_id'               => '143000000000305',
                'supplier_id'           => '126000000000003',
            ],
            [
                'number'                => 'AP/QDC/2025/000165',
                'date'                  => '2025-08-02',
                'sub_budget'            => '240 - Cendana Andalas',
                'supplier'              => 'VDR0006 - Alumagada Jaya Mandiri',
                'total_idr'             => 1950000,
                'total_other_currency'  => 0,
                'total_equivalent_idr'  => 1950000,
                'tax_invoice_number'    => 'INV/QDC/2025/000185',
                'submitter'             => 'Rahmata Novanisa',
                'status'                => 'Final Approval',
                'project_id'            => '46000000000033',
                'site_id'               => '143000000000307',
                'supplier_id'           => '126000000000004',
            ],
            [
                'number'                => 'AP/QDC/2025/000166',
                'date'                  => '2025-08-03',
                'sub_budget'            => '235 - Bukit Pakis Sby Infill',
                'supplier'              => 'VDR0005 - Alpine Cool Utama',
                'total_idr'             => 1100000,
                'total_other_currency'  => 0,
                'total_equivalent_idr'  => 1100000,
                'tax_invoice_number'    => 'INV/QDC/2025/000186',
                'submitter'             => 'Seftiyan Hadi Maulana',
                'status'                => 'Ongoing',
                'project_id'            => '46000000000033',
                'site_id'               => '143000000000305',
                'supplier_id'           => '126000000000003',
            ],
        ];

        $filtered = [];
        $totalIDR = 0;
        $totalOtherCurrency = 0;
        $totalEquivalentIDR = 0;
        foreach ($dummyData as $data) {
            $dueDate = Carbon::parse($data['date']);

            // Validasi wajib: project_id harus cocok
            if ($data['project_id'] != $project['id']) {
                continue; // skip jika tidak cocok
            }

            // Validasi opsional
            $isSiteMatch        = isset($site['id']) ? $data['site_id'] == $site['id'] : true;
            $isSupplierMatch    = isset($supplier['id']) ? $data['supplier_id'] == $supplier['id'] : true;
            $isDateInRange      = !empty($date) ? $dueDate->between($startDate, $endDate) : true;

            if ($isSiteMatch && $isSupplierMatch && $isDateInRange) {
                $filtered[] = $data;
            }

            $totalIDR += $data['total_idr'];
            $totalOtherCurrency += $data['total_other_currency'];
            $totalEquivalentIDR += $data['total_equivalent_idr'];
        }

        // if (empty($filtered)) {
        //     throw new Exception('Tidak ditemukan data Account Payable untuk parameter tersebut.');
        // }

        $compact = [
            'project'               => $project,
            'site'                  => $site,
            'supplier'              => $supplier,
            'date'                  => $date,
            'totalIDR'              => $totalIDR,
            'totalOtherCurrency'    => $totalOtherCurrency,
            'totalEquivalentIDR'    => $totalEquivalentIDR,
            'data'                  => $filtered
        ];

        return $compact;
    }
}