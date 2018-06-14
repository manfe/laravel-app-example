<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User as User;

class UserTest extends TestCase
{

    public function testFormattedUser() {
        $user = new User;
        $user->name = "Mauricio";
        $user->email = "mauricio.ferreira@ifc.edu.br";
        $user->password = '123456';
        $user->save();

        $this->assertSame("MAURICIO", $user->formatted());
    }
}
