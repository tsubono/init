@extends('layouts.app')

@section('title', __('message.Intellectual Property Length Guidelines'))

@section('content')
    <section class="l-content-block p-team">
        <div class="container pb-100px">
            <p>{{ __('message.Established and enforcement date: September 17, 3rd year') }} </p>
            <br>
            <p>
                <b>・{{ __('message.About intellectual property rights') }} </b><br>
                {{ __('message.Most of the familiar things such as copyrights, portrait rights, rights that arise for various creations such as publicity rights, and trademark rights registered with the Patent Office are protected by various rights.') }} <br>
                {{ __('message.Therefore, we will share the opinion of the INIT secretariat about copyright, portrait rights and publication rights.') }} <br>
                <br>
                <b>•{{ __('message.About copyright') }} </b><br>
                {{ __('message.Copyright is all works, for example, sentences, pictures, music, photos, images, computer brigames, etc., and that right is created and protected by creators.') }} <br>
                <br>
                {{ __('message.It is necessary to obtain the author's consent of the secondary use, regardless of why the work is for commercial and non-profit.') }} <br>
            </p>
            <br>
            <p>
                【{{ __('message.example') }} 】<br>
                　<b>{{ __('message.About teaching materials used in lessons') }} </b><br>
                •{{ __('message.It is possible to distribute copies of works that do not hold rights and their copies as lesson materials and problems, or delete and publish their works') }}  <b>{{ __('message.Copyright infringement') }} </b>{{ __('message.It is judged to hit.') }} <br>
                •{{ __('message.It is also possible to extract them and provide them as PDFs and materials, even when using newspaper articles and information, etc. that are publicly released on the website as data.') }} <b>{{ __('message.Prohibition of replication,') }} </b>{{ __('message.&') }}<b>{{ __('message.Prohibition of modification') }} </b>{{ __('message.Please note that it will be judged to be a matter.') }} <br>
                •<b>{{ __('message.Copyright protection obligation') }} </b>{{ __('message.Based on the Convention of each country,') }}  <b>{{ __('message.Init is premised that it will be published worldwide as services on the Internet') }} </b>{{ __('message.Please understand that it is.') }} <br>
                <br>
                　<b>{{ __('message.About the use of images') }} </b><br>
                •{{ __('message.Publish as auxiliary document to convey the image of the lesson') }} <b>{{ __('message.image') }} </b>{{ __('message.Etc., such as the image uploaded in My Page') }} <b>{{ __('message.Copyright, Portrait Right, Publicity Right') }} </b>{{ __('message.May be protected.') }} <br>
                {{ __('message.Basically, the copyright is attributable to yourself about the images taken by yourself.') }}  <b>{{ __('message.Portrait rights and publicity rights have been issued on the photographed subjects') }} </b>{{ __('message.Please confirm.') }} <br>
                {{ __('message.Published on the Internet and provided') }}  <b>{{ __('message.Free image') }} </b>{{ __('message.Please be sure to use') }} <b>{{ __('message.Usage range specified by the provider') }} </b>{{ __('message.Please check the condition about.') }} <br>
            </p>
            <br>
            <p>
                <b>•{{ __('message.Look at the INIT secretariat') }} </b><br>
                {{ __('message.Since these rights are not legally stated rights, the cases of complaints and the judgment results of legal institutions will be reflected accordingly, and the disposition will be decided. Therefore, the Secretariat cannot make any judgments regarding these rights, such as 'this usage method is okay' or 'this usage method constitutes an infringement of the rights'.') }} <br>
                <br>
                {{ __('message.If there are inquiries, complaints, claims, etc. from concessionaires or third parties related to your use, or if there is a dispute, we will not be involved in this response. Please handle all matters such as expenses at your own risk.') }} <br>
                <br>
                {{ __('message.In addition, we may respond to reports of copyright infringement from authors and concessionaires who have proper procedures and requests for disclosure of personal information from investigative agencies.') }} <br>
            </p>
        </div>
    </section>
@endsection
