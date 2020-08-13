<?php
namespace App\Traits;

    trait UserTrait {

        public function roles(){

            return $this->belongsToMany('App\Roles')->withTimestamps();

        }

        public function havePermisos($permiso){

            foreach ($this->roles as $role){
                if( $role['full-access']== "si"){
                    return true;
                }

                foreach ($role->permisos as $perm){

                    if($perm->slug == $permiso){
                        return true;
                    }
                }
            }
            return false;

        }

       }
