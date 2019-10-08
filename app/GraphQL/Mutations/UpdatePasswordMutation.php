<?php

namespace App\GraphQL\Mutations;

use Closure;
use App\User;
use GraphQL;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Mutation;

class UpdatePasswordMutation extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateUserPassword'
    ];

    public function type(): Type
    {
        return GraphQL::type('user');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id', 
                'type' => Type::nonNull(Type::string()), 
                'rules' => ['required']
            ],
            'password' => [
                'name' => 'password', 
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required', 'email']
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $user = User::find($args['id']);
        if(!$user) {
            return null;
        }

        $user->password = bcrypt($args['password']);
        $user->save();

        return $user;
    }
}