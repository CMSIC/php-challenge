<?php

namespace App\Models;

use App\Core\SQL;

class Note extends SQL
{
    private int $id = 0;
    protected int $film_id;
    protected int $user_id;
    protected int $note;

    public function __construct()
    {
        parent::__construct();
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getFilmId(): int
    {
        return $this->film_id;
    }

    public function setFilmId(int $film_id): void
    {
        $this->film_id = $film_id;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getNote(): int
    {
        return $this->note;
    }

    public function setNote(int $note): void
    {
        $this->note = $note;
    }
}
