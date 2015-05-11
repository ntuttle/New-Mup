/**
 * Custom JS File
 * --------------------------------------------------
 **/

/**
 * For IPs Modules
 * --------------------------------------------------
 **/
// Pools Overview
$(document).on('click','table#PoolTable td#name',function(){
    var id = $(this).parent().attr('id');
    container = $('div#PoolOverview').find('div[role=content]');
    loadURL('pages/ips/modules/ui.pool_overview.php?pool='+id,container);
});
// Ranges Overview
$(document).on('click','table#MailingRanges td#name',function(){
    var id = $(this).parent().attr('id');
    container = $('div#PoolOverview').find('div[role=content]');
    loadURL('pages/ips/modules/ui.pool_overview.php?range='+id,container);
});



/**
 * For Offers Modules
 * --------------------------------------------------
 **/
// Offer Overview
$(document).on('click','table#OffersTable td#name',function(){
    var id = $(this).parent().attr('id');
    container = $('div#OfferOverview').find('div[role=content]');
    loadURL('pages/offers/modules/ui.offer_overview.php?id='+id,container);
});
// Edit Offer Details
$(document).on('click','button#EditOfferDetailsForm',function(){
	var id = $(this).attr('name');
	loadURL('/pages/offers/modules/form.offer_details.php?id='+id,$('div.OfferDetails'));
});
// Offer Active Status
$(document).on('click','table#OffersTable td#on span.btn',function(){
    var sts = $(this).text();
    var td = $(this).parent();
    var id = td.parent().attr('id');
    loadURL('pages/offers/modules/update.offer_details.php?id='+id+'&act=toggleActive&sts='+sts,td);
});
// Offer Auto Inject
$(document).on('click','table#OffersTable td#auto span.btn',function(){
    var sts = $(this).text();
    var td = $(this).parent();
    var id = td.parent().attr('id');
    loadURL('pages/offers/modules/update.offer_details.php?id='+id+'&act=toggleAuto&sts='+sts,td);
});
// Offer Suppressions
$(document).on('click','table#OffersTable td#sup span.btn',function(){
    var td = $(this).parent();
    var id = td.parent().attr('id');
	$('#content').append('<article id=\"OfferSuprression'+id+'\"><div role=\"content\"></div></article>');
	var container = $('article#OfferSuprression'+id);
    loadURL('pages/offers/modules/form.offer_suppression.php?id='+id,container);
});
// Offer Froms
$(document).on('click','article#OfferOverview table#OfferFroms td#on span.btn',function(){
    var sts = $(this).text();
    var td = $(this).parent();
    var id = td.parent().attr('id');
    loadURL('pages/offers/modules/update.offer_element.php?type=from&id='+id+'&sts='+sts,td);
});
// Offer Subjects
$(document).on('click','table#OffersSubjects td#on span.btn',function(){
    var sts = $(this).text();
    var td = $(this).parent();
    var id = td.parent().attr('id');
    loadURL('pages/offers/modules/update.offer_element.php?type=subject&id='+id+'&sts='+sts,td);
});



/**
 * For Modal functions
 * --------------------------------------------------
 **/
$(document).on('click','button#cancel',function(){
    var modal = $('div.modal#Modal');
    modal.css({'display':'none'}).attr('class','modal fade');
    modal.find('div.modal-backdrop').remove();
});
$(document).on('click','div.modal-backdrop',function(){
    var modal = $('div.modal#Modal');
    modal.css({'display':'none'}).attr('class','modal fade');
    modal.find('div.modal-backdrop').remove();
});
$(document).on('click','div.modal-header button.close',function(){
    var modal = $('div.modal#Modal');
    modal.css({'display':'none'}).attr('class','modal fade');
    modal.find('div.modal-backdrop').remove();
});
$(document).on('click','i.toggleDTblTools',function(){
    $(this).parent().parent().parent().find('div.dt-toolbar').toggle('fast','easeInOutElastic');
});
$(document).on('click','i.toggleModTools',function(){
    var container = $(this).parent().parent().parent();
    container.find('div.ModTools').remove();
    var id = container.attr('id');
    container.find('div[role=content]').prepend('<div class="ModTools well well-sm bg-color-darken fade in"></div>');
    var box = container.find('div[role=content]').find('div.well');
    loadURL('pages/_dashboard/modules/form.module_settings.php?id='+id,box);
});
$(document).on('click','button.ModalBtn',function(){
    var modal = $('div.modal#Modal');
    modal.prepend('<div class="modal-backdrop fade in" style="height:'+$(window).height()+'px"></div>');
    modal.css({'display':'block'}).attr('class','modal fade in');
    var url = $(this).attr('href').replace(/^#/,'');
    var container = modal.find('div.modal-content');
    loadURL(url,container);
});



/**
 * For Navbar Counters
 * --------------------------------------------------
 **/
$(document).on('click','table#AvailableDomains td#name',function(){
    var id = $(this).parent().attr('id');
    container = $('div#DomainSearch').find('div[role=content]');
    loadURL('pages/domains/modules/ui.domain_search.php?domain_search='+id,container);
});



/**
 * For Navbar Counters
 * --------------------------------------------------
 **/
$(document).ready(function(){
    var container = $('b.badge#ActiveIPsCount');
    loadURL('pages/_dashboard/modules/nav.counters.php?count=IPsCount',container);
    var container = $('b.badge#ActiveDomainCount');
    loadURL('pages/_dashboard/modules/nav.counters.php?count=DomainCount',container);
    var container = $('b.badge#ActiveListsCount');
    loadURL('pages/_dashboard/modules/nav.counters.php?count=ListsCount',container);
    var container = $('b.badge#ActiveSeedCount');
    loadURL('pages/_dashboard/modules/nav.counters.php?count=SeedCount',container);
    var container = $('b.badge#ActiveOfferCount');
    loadURL('pages/_dashboard/modules/nav.counters.php?count=OfferCount',container);
});