<?php

namespace App\Models;

use App\Core\SQL;

class Comment extends SQL
{
    private int $id;
    private int $film_id;
    private int $user_id;
    private string $content;
    private string $date_inserted;

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

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getDateInserted(): string
    {
        return $this->date_inserted;
    }

    public function setDateInserted(string $date_inserted): void
    {
        $this->date_inserted = $date_inserted;
    }
}
