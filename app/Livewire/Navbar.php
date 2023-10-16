<?php

namespace App\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    public function render()
    {
        return <<<'HTML'
          <div>
            <div class="container">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a href="/" class="nav-link"  wire:navigate>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                    Início
                  </a>
                </li>
              </ul>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light">
              <div class="container p-0 justify-content-center">
                <a class="navbar-brand" href="/" class="nav-link"  wire:navigate>
                  <img src="{{ asset('img/logotipo.png') }}" alt="Logo" width="250">
                </a>
              </div>
            </nav>

          </div>
        HTML;
    }
}
