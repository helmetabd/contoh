import 'flowbite';
import {
    Collapse,
    Dropdown,
    Ripple,
    Input,
    Sidenav,
    initTE,
    Datatable
} from "tw-elements";
import './../../vendor/power-components/livewire-powergrid/dist/powergrid'
import './../../vendor/power-components/livewire-powergrid/dist/powergrid.css'
import lodash from "lodash";

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
window.Lodash = lodash;

Alpine.start()