<?php

namespace Indofx\Mutasibank\Traits;

trait MutasibankAPI
{
    /**
     * getCurrentUser
     *
     * @return \Aslam\Response\Response
     */
    public function getCurrentUser()
    {
        return $this->send('GET', 'user');
    }

    /**
     * getAllAccount
     *
     * @return \Aslam\Response\Response
     */
    public function getAllAccount()
    {
        return $this->send('GET', 'accounts');
    }

    /**
     * getAccountById
     *
     * @param  mixed $id
     * @return \Aslam\Response\Response
     */
    public function getAccountById($id)
    {
        return $this->send('GET', 'account/' . $id);
    }

    /**
     * validateTransaction
     *
     * @param  mixed $id
     * @return \Aslam\Response\Response
     */
    public function validateTransaction($id)
    {
        return $this->send('GET', 'validate/' . $id);
    }

    /**
     * rerunCheckMutasi
     *
     * @param  mixed $accountId
     * @return \Aslam\Response\Response
     */
    public function rerunCheckMutasi($accountId)
    {
        return $this->send('GET', 'rerun/' . $accountId);
    }

    /**
     * getAccountStatement
     *
     * @param  mixed $accountId
     * @return \Aslam\Response\Response
     */
    public function getAccountStatement(int $accountId, string $dateFrom = '', string $dateTo = '')
    {
        $options = ['form_params' => ['date_from' => $dateFrom, 'date_to' => $dateTo]];

        if (!$dateFrom || !$dateTo) {
            $options = [];
        }

        return $this->send('POST', 'statements/' . $accountId, $options);
    }

    /**
     * matchTransaction
     *
     * @return \Aslam\Response\Response
     */
    public function matchTransaction($accountId, $amount)
    {
        return $this->send('POST', 'match/' . $accountId, ['form_params' => ['amount' => $amount]]);
    }

    /**
     * onOffAccount
     *
     * @param  mixed $accountId
     * @return \Aslam\Response\Response
     */
    public function onOffAccount($accountId)
    {
        return $this->send('POST', 'on_off/' . $accountId);
    }
}
