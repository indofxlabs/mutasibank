<?php

namespace Indofx\Mutasibank\Traits;

trait MutasibankAPI
{
    public function getCurrentUser()
    {
        return $this->send('GET', 'user');
    }

    public function getAllAccount()
    {
        return $this->send('GET', 'accounts');
    }

    public function getAccountById($id)
    {
        return $this->send('GET', 'account/' . $id);
    }

    public function validateTransaction($id)
    {
        return $this->send('GET', 'validate/' . $id);
    }

    public function rerunCheckMutasi($accountId)
    {
        return $this->send('GET', 'rerun/' . $accountId);
    }

    public function matchTransaction()
    {
        return $this->send('POST', 'match');
    }

    public function getAccountStatement($accountId)
    {
        return $this->send('POST', 'statements/' . $accountId);
    }

    public function onOffAccount($accountId)
    {
        return $this->send('POST', 'on_off/' . $accountId);
    }
}
