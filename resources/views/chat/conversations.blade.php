<div class="col-md-4 col-xl-3 chat">
    <div class="card mb-sm-3 mb-md-0 contacts_card">
        @include('chat.search')
        <div class="card-body contacts_body">
            <ui class="contacts">
                @include('chat.contact-card')
                @include('chat.contact-card-inactive')
            </ui>
        </div>
        <div class="card-footer"></div>
    </div>
</div>
