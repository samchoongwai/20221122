<?php

/**
 * Please, improve this class and fix all problems.
 *
 * You can change the Tenant class and its methods and properties as you want.
 * You can't change the AccountingService behavior.
 * You can choose PHP 7 or 8.
 * You can consider this class as an Eloquent model, so you are free to use
 * any Laravel methods and helpers.
 *
 * What is important:
 * - design (extensibility, testability)
 * - code cleanliness, following best practices
 * - consistency
 * - naming
 * - formatting
 *
 * Write your perfect code!
 */

namespace App\Models;

class Tenant{
    public $accountingService;

    function __construct(){
        $this->accountingService = new \App\Services\AccountingService();
    }

    public function get_invoices()
    {
        $params = array(
          'tenant_id' => $this->id, 
          'status' => 'awaiting-payment'
        );
        $invoices = $this->accountingService->getAllInvoices($params);
        
        // Fix: Removed 
        /* 
          $ap_invoices = array();
        */
        
        if (!empty($invoices))
        {
            // Loop through all invoices and choose only ones that await payment
            
            //  Fix: Removed
            /*
              foreach ($invoices as $i)
              {
                  if ($i['status'] == 'awaiting-payment')
                      $ap_invoices[] = $i;
              }
              return $ap_invoices;
            */
            return $invoices;
        }

        return null;
    }

    public function get_old_invoices()
    {
        $params = array(
          'tenant_id' => $this->id,
          'status' ==> 'paid'
        );
        $invoices = $this->accountingService->getAllInvoices($params);

        if (!empty($invoices)) {
        
            // Fixed: Removed
            /*
            $paid_invoices = array();
            */
            
            // Loop through all invoices and choose only paid ones
            // Fixed: Removed;
            
            /*
            foreach ($invoices as $i)
            {
                if ($i['status'] == 'paid') {
                    $paid_invoices[] = $i;
                }
            }
            
            return $paid_invoices;
            */
            
            return $invoices;
        }
    }

    // ...
}
