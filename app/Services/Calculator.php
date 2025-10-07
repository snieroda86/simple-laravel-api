<?php 
namespace App\Services;

use App\Models\User;

class Calculator
{
    protected User $user;
    protected $name = "Janusz";

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function add($a, $b)
    {
        return 'Użytkownik ' . $this->user->name . ' obliczył wynik: ' . ($a + $b);
    }
}
