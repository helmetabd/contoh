import {
    Collapse,
    Dropdown,
    Ripple,
    Input,
    Sidenav,
    initTE,
    Datatable
} from "tw-elements";

initTE({ 
    Ripple, 
    Collapse, 
    Dropdown,
    Input,
    Sidenav,
    Datatable 
});

import Alpine from 'alpinejs'

window.Alpine = Alpine

import './../../vendor/power-components/livewire-powergrid/dist/powergrid'
import './../../vendor/power-components/livewire-powergrid/dist/powergrid.css'

Alpine.start()

import 'flowbite';