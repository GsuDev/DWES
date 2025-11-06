<?php

class User
{
  function __construct(
    public Int $id,
    public String $name,
    public String $password,
    public String $email,
    public Bool $isAdmin
  ){}
}