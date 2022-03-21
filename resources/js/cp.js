import Dashboard from './Components/Dashboard';
import TopPages from './Components/TopPages';
import TopBrowser from './Components/TopBrowser';
import TopReferrers from './Components/TopReferrers';
import VisitorOverview from './Components/VisitorOverview';

Statamic.booting(() => {
    Statamic.$components.register('plausible-dashboard', Dashboard);
    Statamic.$components.register('plausible-top-pages', TopPages);
    Statamic.$components.register('plausible-top-browsers', TopBrowser);
    Statamic.$components.register('plausible-top-referrers', TopReferrers);
    Statamic.$components.register('plausible-visitor-overview', VisitorOverview);
});
