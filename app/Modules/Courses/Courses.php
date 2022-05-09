<?php
declare(strict_types =1);

namespace App\Modules\Courses;

class  Courses
{
    private  ?int $id ;
    private string  $name ;
    private  int  $capacity ;
    private  int  $totalStudentEnrolled ;
    private ?string $deletedAt ;
    private string $createdAt ;
    private ?string $updatedAt ;

    public  function  __construct(
        ?int    $id,
        string  $name,
        int     $capacity,
        int     $totalStudentEnrolled,
        ?string  $deletedAt,
        string  $createdAt,
        ?string  $updatedAt,
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->capacity = $capacity;
        $this->totalStudentEnrolled = $totalStudentEnrolled;
        $this->deletedAt = $deletedAt;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int|null
     */
    public function getCapacity(): int
    {
        return $this->capacity;
    }

    /**
     * @return string|null
     */
    public function getDeletedAt(): ?string
    {
        return $this->deletedAt;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @return string|null
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    public function getTotalStudentSEnrolled(): int
    {
        return $this->totalStudentEnrolled;
    }


    public  function  toArray() :array
    {
        return  [
            "id"        => $this->id,
            "name"      => $this->name,
            "capacity"     => $this->capacity,
            "totalStudentEnrolled"     => $this->totalStudentEnrolled,
            "deletedAt" => $this->deletedAt,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        ];
    }

    public  function  toSQL() :array
    {
        return  [
            "id"            => $this->id,
            "name"          => $this->name,
            "capacity"         => $this->capacity,
            "deleted_at"     => $this->deletedAt,
            "created_at"    => $this->createdAt,
            "updated_at"    => $this->updatedAt,
        ];
    }
}
