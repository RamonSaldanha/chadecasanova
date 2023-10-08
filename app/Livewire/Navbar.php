<?php

namespace App\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    public function render()
    {
        return <<<'HTML'
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Chá de casa nova</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a href="/" class="nav-link"  wire:navigate>Início</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/form-product" wire:navigate>Adicionar presentes</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        HTML;
    }
}
