import AppListing from '../app-components/Listing/AppListing';

Vue.component('detail-task-listing', {
    mixins: [AppListing],
    props:['role', 'logueado'],
    data: function() {
        return {
            //role: this.role
        }
    }
});
