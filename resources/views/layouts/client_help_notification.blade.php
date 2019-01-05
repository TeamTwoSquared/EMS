
@if(count($newCommentNotificationForHelp)==1){
    <?php
        $newHelpRequest = DB::table('notifications')->where('is_read',0)->where('type',2)->where('customer_id',session()->get('customer_id'))->value('notification');
        
    ?>                
        <a href='/client/support'><div class='notifi__item'> 
            <div class='bg-c3 img-cir img-40'> 
                <i class='zmdi zmdi-file-text'></i> 
            </div>                                                     
            <div class='content'> 
                <p>{{$newHelpRequest}}</p> 
                <span class='date'>Time feild to be complete</span> 
            </div>                                                     
        </div> 
        </a>
@endif
@if(count($newCommentNotificationForHelp)>1){
    <a href='/client/support'><div class='notifi__item'> 
                <div class='bg-c3 img-cir img-40'> 
                    <i class='zmdi zmdi-file-text'></i> 
                </div>                                                     
                <div class='content'> 
                    <p>You Have <b>{{count($newCommentNotificationForHelp)}}</b>  Notifications From EMS Support Center</p> 
                    <span class='date'>Time feild to be complete</span> 
                </div>                                                     
            </div>  
    </a>
@endif


