import job from './components/JobComponent';
import addJob from './components/addJob';

export default[
    { path:'/jobs'   , component: job   },
    { path:'/add-job', component: addJob },
    { path:'*', component: addJob }


]
