
import pending from './components/pending';
import detail from './components/Detail';

// membuat router
export const routes = [
    {
        name: 'pending',
        path: '/order/pending',
        component: pending
    },
    {
        name: 'detail',
        path: '/order/detail/:id',
        component: detail
    }
    // {
    //     name: 'create',
    //     path: '/create',
    //     component: Create
    // },
    // {
    //     name: 'update',
    //     path: '/detail/:id',
    //     component: Update
    // }
    // ,
    // {
    //     name: 'read2',
    //     path: '/read2',
    //     component: Read2
    // }
]
