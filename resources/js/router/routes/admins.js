import Admins from "../../pages/Admins/Admins";

export default [
  {
    path: 'admins',
    name: 'Admins',
    component: Admins,
    meta: {
      title: 'Admins',
      breadcrumb: 'List',
      description: '',
      requiredAuth: true
    }
  }
]
