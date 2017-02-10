
<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-bubble font-red-sunglo"></i>
            <span class="caption-subject font-red-sunglo bold uppercase">Mensajes</span>
        </div>

    </div>
    <div class="portlet-body" id="chats">
        <div class="scroller" style="height:100%;" data-always-visible="1" data-rail-visible1="1">
            
            <ul class="chats" id="ulchats">
               <?php foreach($messages as $message):?>
                    <li class="<?php echo ($message->reply_to > 0) ? 'out' : 'in'; ?>">
                        <img class="avatar" alt="" src="" />
                        <div class="message">
                            <span class="arrow"> </span>
                            <a href="javascript:;" class="name"> <?php
                                echo $message->name . ' ' . $message->email;
                                ?> </a>
                            <span class="datetime">a las <?php echo date('H:i d/m/Y', strtotime($message->date)); ?> </span>
                            <span class="body"> <?php echo $message->message ?></span>
                        </div>
                    </li>
                <?php endforeach; ?>    
            </ul>
            
        </div>
       <input type="hidden" name="messages_id" id="messages_id" value="<?php echo $first_message_id ?>"/>
       <input type="hidden" name="username" id="username" value="<?php echo $username ?>"/>
       
        <div class="chat-form">
            <div class="input-cont">
                <input class="form-control" type="text" id="text" placeholder="Tipeá el comemtario acá y apretá la tilde para mandar..." /> </div>
            <div class="btn-cont">
                <span class="arrow"> </span>
                <a href="" id="send_response" class="btn blue icn-only">
                    <i class="fa fa-check icon-white"></i>
                </a>
            </div>
            
        </div>
       
            <input type="hidden" name="img_val" id="img_val" value="" />
            <input type="hidden" name="messages_id" id="messages_id" value="<?php echo $first_message_id ?>"/>
            <textarea name="texto_for_share" id="texto_for_share"></textarea>
        
       <input type="submit" value="Compartir" onclick="capture();" />
    </div>
</div>
                    </div>
</div>

