require('./init-facebook-sdk')
import Cookies from '../../vendor/js.cookie.mjs'

// $(document).ready(function () {
//     $('.share').click(function () {
//         let campaignId = $(this).data('campaign-id');
//         let currentRouteWithCampaign = `${currentRoute}/${campaignId}`;
//
//         if (
//           navigator.userAgent.match(/Android/i)
//           || navigator.userAgent.match(/webOS/i)
//           || navigator.userAgent.match(/iPhone/i)
//           || navigator.userAgent.match(/iPad/i)
//           || navigator.userAgent.match(/iPod/i)
//           || navigator.userAgent.match(/BlackBerry/i)
//           || navigator.userAgent.match(/Windows Phone/i)
//         ){
//             window.location.replace(sharingRouteMobile+'&campaign_id='+campaignId);
//             return;
//         }
//
//         FB.getLoginStatus(function (response) {
//             if (response.status === 'connected') {
//                 openDialog(response.authResponse,  null, currentRouteWithCampaign, currentType, campaignId);
//             } else {
//                 FB.login(function (response) {
//                     if (response.status === 'connected') {
//                         openDialog(response.authResponse, null, currentRouteWithCampaign, currentType, campaignId);
//                     }
//                 });
//             }
//         }, true);
//     })
//
//     /**
//      *
//      * @param userAuth
//      * @param hashtag
//      * @param href
//      * @param type
//      * @param campaignId
//      * @returns {Promise<void>}
//      */
//      async function openDialog(userAuth, hashtag, href, type, campaignId) {
//         // If shared you wont share
//          let checkInServer = true;
//          await checkIsShared(userAuth.userID, type, campaignId).then( res => {
//              checkInServer = res;
//          })
//
//          if (checkInServer){
//              Swal.fire('Thật xin lỗi', 'Bạn đã chia sẻ bài viết này!', 'warning');
//          }else {
//              FB.ui(
//                {
//                    method: 'share',
//                    href: href,
//                    hashtag: hashtag ?? '#nhatbantoiyeu',
//                    quote: 'https://www.japan.travel/vi/vn/nhatbantoiyeu\nChia sẻ ngay khoảnh khắc tại Nhật Bản của bạn để nhận được những phần quà hấp dẫn!',
//                    display: 'popup'
//                },
//                function (response) {
//                    if (response && response.constructor.name === 'Array') {
//                        Cookies.set(userAuth.userID+'-'+type+'-'+campaignId, 'shared',{ expires: 60 });
//                        Swal.fire('Cảm ơn bạn', 'Bài viết đã được chia sẻ thành công!', 'success');
//                        $.ajax({
//                            method: 'POST',
//                            url: sharingRoutePC,
//                            data: {
//                                user_id: userAuth.userID,
//                                type: type,
//                                campaign_id: campaignId
//                            }
//                        }).done((res) => {}).fail((err) => {
//                            console.log(err)
//                        });
//                    }
//                });
//          }
//     }
//
//     /**
//      *
//      * @param userID
//      * @param type
//      * @param campaignId
//      * @returns {Promise<boolean|*>}
//      */
//     async function  checkIsShared(userID, type, campaignId) {
//         if (Cookies.get(userID+'-'+type+'-'+campaignId)){
//             return true;
//         }
//         try{
//             let checkInServer = await callAPIFunc(userID, type, campaignId);
//             if (checkInServer.is_shared){
//                 Cookies.set(userID+'-'+type+'-'+campaignId, 'shared',{ expires: 90 });
//             }
//             return checkInServer.is_shared;
//         }catch (e) {
//             return true;
//         }
//     }
//
//     /**
//      *
//      * @param userID
//      * @param type
//      * @param campaignId
//      * @returns {*}
//      */
//     function callAPIFunc (userID, type, campaignId) {
//         return $.ajax({
//             method: 'GET',
//             url: sharingRoutePC,
//             data: {
//                 user_id: userID,
//                 type: type,
//                 campaign_id: campaignId,
//             },
//         })
//     }
// })
