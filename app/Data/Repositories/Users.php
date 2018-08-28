<?php
namespace App\Data\Repositories;

use App\Data\Models\User;
use App\Services\Authorization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Users extends Base
{
    /**
     * @var string
     */
    protected $model = User::class;

    /**
     * @var Authorization
     */
    private $authorization;

    /**
     * Users constructor.
     *
     * @param Authorization $authorization
     */
    public function __construct(Authorization $authorization)
    {
        $this->authorization = $authorization;
    }

    /**
     * @param $request
     *
     * @return mixed
     */
    private function credentials($request)
    {
        return $request->only(['username', 'password']);
    }

    /**
     * @param $email
     *
     * @return mixed
     */
    public function findUserByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function findUserById($id)
    {
        return User::find($id);
    }

    /**
     * @param $request
     * @param $remember
     *
     * @return bool
     */
    public function loginUser($request, $remember)
    {
        try {
            $credentials = extract_credentials($request);

            if (
                is_null(
                    $user = $this->findUserByEmail(
                        $email = "{$credentials['username']}@alerj.rj.gov.br"
                    )
                )
            ) {
                $user = new User();

                $user->name = $credentials['username'];

                $user->username = $credentials['username'];

                $user->email = $email;

                $user->password = Hash::make($email);

                $user->save();
            }

            Auth::login($user, $remember);
        } catch (\Exception $exception) {
            return false;
        }

        return true;
    }

    /**
     * @param $type
     *
     * @return mixed
     */
    public function getByType($type)
    {
        return $this->makeResultForSelect(
            $this->model::type($type)->get(),
            'name'
        );
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return User::orderBy('name')->get();
    }

    public function notifiables()
    {
        return User::where('all_notifications', true)->get();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function findByUsername($username)
    {
        return User::where('username', $username)->first();
    }

    public function removeAdmin($username)
    {
        return $this->setAdminFlag($username, false);
    }

    public function addAdmin($username)
    {
        return $this->setAdminFlag($username, true);
    }

    /**
     * @param $username
     * @return null
     */
    protected function setAdminFlag($username, $flag)
    {
        if (is_null($user = $this->findByUsername($username))) {
            return null;
        }

        $user->is_admin = $flag;

        $user->save();

        return $user;
    }
}
