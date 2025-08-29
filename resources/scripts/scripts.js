import 'virtual:svg-icons/register'
import '../styles/styles.css';
import Alpine from 'alpinejs';
import InitMenu from './menu.js';
import InitResultsList from './resultsList.js';

window.addEventListener("load", () => {
  Alpine.start();
  InitMenu();
  InitResultsList();
});
