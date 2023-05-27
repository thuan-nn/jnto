import Stories from "../../pages/Stories/Stories";

export default [
  {
    path: 'stories',
    name: 'Stories',
    component: Stories,
    meta: {
      title: 'Stories',
      breadcrumb: 'List',
      description: '',
      requiredAuth: true,
    }
  }
]
