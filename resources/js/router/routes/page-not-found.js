// import components
import PageNotFound from '../../pages/PageNotFound/PageNotFound'

export default {
  path: 'page-not-found',
  name: 'PageNotFound',
  component: PageNotFound,
  meta: {
    title: 'ページが見つかりません',
    description: '',
    requireAuth: true,
    permission: ['account', 'admin'],
  }
}
