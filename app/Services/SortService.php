<?php
namespace App\Services;

use App\Repositories\SortRepository;

class SortService
{
    private $sortRepo;


    public function __construct(SortRepository $sortRepo)
    {
        $this->sortRepo = $sortRepo;
    }

    public function get()
    {

        $sorts = $this->sortRepo->get(); //透過repository取資料

        /*
            這邊可能有商業邏輯
            ...
            ...
        */

        return $sorts;
    }

    public function set($subject)
    {

        $sorts = $this->sortRepo->set($subject); //透過repository寫入資訊

        /*
            這邊可能有商業邏輯
            ...
            ...
        */

        return $sorts;
    }

    public function update($id, $subject)
    {

        $sorts = $this->sortRepo->update($id, $subject); //透過repository更新資訊

        /*
            這邊可能有商業邏輯
            ...
            ...
        */

        return $sorts;
    }

    public function delete($id)
    {

        $sorts = $this->sortRepo->delete($id); //透過repository更新資訊

        /*
            這邊可能有商業邏輯
            ...
            ...
        */

        return $sorts;
    }
}
