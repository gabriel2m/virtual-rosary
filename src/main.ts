import Alpine from 'alpinejs';
import bead1 from './partials/beads/1.html?raw';
import bead2 from './partials/beads/2.html?raw';
import bead3 from './partials/beads/3.html?raw';

declare global {
  interface Window {
    Alpine: Alpine.Alpine;
    beads: {
      '1': string,
      '2': string,
      '3': string,
    }
  }
}

window.beads = {
  '1': bead1,
  '2': bead2,
  '3': bead3
};

window.Alpine = Alpine;
Alpine.start();
