import Dashboard from './Components/Dashboard';

Statamic.booting(() => {
    Statamic.$components.register('plausible-dashboard', Dashboard);
});
