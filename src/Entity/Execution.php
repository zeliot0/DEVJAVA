<?php

namespace App\Entity;

use App\Repository\ExecutionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExecutionRepository::class)]
class Execution
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_exe')]
    private ?int $id_exe = null;

    #[ORM\Column(length: 255)]
    private ?string $title_exe = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $desc_exe = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $status_exe = null;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private ?\DateTimeImmutable $createAt_exe = null;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private ?\DateTimeImmutable $updateAT_exe = null;

    #[ORM\ManyToOne(targetEntity: Task::class, inversedBy: 'executions')]
    #[ORM\JoinColumn(
        name: 'task_id',
        referencedColumnName: 'id_task',
        nullable: false,
        onDelete: 'CASCADE'
    )]
    private ?Task $task = null;

    public function getIdExe(): ?int
    {
        return $this->id_exe;
    }

    public function getTitleExe(): ?string
    {
        return $this->title_exe;
    }

    public function setTitleExe(string $title_exe): static
    {
        $this->title_exe = $title_exe;

        return $this;
    }

    public function getDescExe(): ?string
    {
        return $this->desc_exe;
    }

    public function setDescExe(string $desc_exe): static
    {
        $this->desc_exe = $desc_exe;

        return $this;
    }

    public function getStatusExe(): ?string
    {
        return $this->status_exe;
    }

    public function setStatusExe(?string $status_exe): static
    {
        $this->status_exe = $status_exe;

        return $this;
    }

    public function getCreateAtExe(): ?\DateTimeImmutable
    {
        return $this->createAt_exe;
    }

    public function setCreateAtExe(?\DateTimeImmutable $createAt_exe): static
    {
        $this->createAt_exe = $createAt_exe;

        return $this;
    }

    public function getUpdateATExe(): ?\DateTimeImmutable
    {
        return $this->updateAT_exe;
    }

    public function setUpdateATExe(?\DateTimeImmutable $updateAT_exe): static
    {
        $this->updateAT_exe = $updateAT_exe;

        return $this;
    }

    public function getTask(): ?Task
    {
        return $this->task;
    }

    public function setTask(?Task $task): static
    {
        $this->task = $task;

        return $this;
    }
}