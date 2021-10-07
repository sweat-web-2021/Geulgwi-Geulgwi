<?php
    namespace Controller;

    class ViewController {
        static function login() {
            view('login');
        }

        static function register() {
            view('register');
        }

        static function main() {
            view('main');
        }
    }