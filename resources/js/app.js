import './bootstrap';

import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse'
import profileDropdown from './components/profile-dropdown';
import toggleInput from './components/toggle-input';
import sidebarSection from './components/sidebar-section';
import topbar from './components/topbar';

window.Alpine = Alpine;

Alpine.plugin(collapse)

Alpine.data('topbar', topbar)
// Alpine.data('sidebarSection', sidebarSection)
Alpine.data('profileDropdown', profileDropdown)
Alpine.data('toggleInput', toggleInput)

Alpine.start();
