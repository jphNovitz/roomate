<?php

namespace App\Twig\Components\Live\List;

use App\Repository\ResidentRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent()]
final class Residents
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public int $query = 5;

    public function __construct(private ResidentRepository $repository)
    {
    }

    public function getResidents(): array
    {
        return $this->repository->findAlphabeticalFirsts($this->query);
    }

}
