@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))


    @if($exception->getMessage() === 'User is not logged in.' or $exception->getMessage() === 'Users does not have the rightroles')
    
        <a style="background-color:darkslategray;color:white;padding:7.5px;margin-top:3rem;margin-left:2rem;border-width:1px;border-color:darkolivegreen;" href="/login">Go back to Login</a>
    @endif
