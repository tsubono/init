@extends('layouts.app')

@section('title', __('message.About tax payment of lecturer fee'))

@section('content')
    <section class="l-content-block p-team">
        <div class="container pb-100px">
            <p>
                •{{ __('message.INIT is about the lesson fee sent from the Company, etc.') }}  <a href="{{ route('adviser-terms') }}#terms14" target="_blank" class="primary-link">{{ __('message.Article 14 Article Article 14') }} ④</a> {{ __('message.As described in') }} <br>
                {{ __('message.Tax obligations and their systems vary and are complex in each country, including Japan. If you have any questions, please be sure to check the website of each institution, or consult with the nearest tax office or the consultation desk of each local tax accountant association.') }} 
            </p>
            <br>
            <p>
                •{{ __('message.Tokyo has a taxpayer support center in Japan Japan Tax Research Center, and has a window called 'Free consultation'.') }} <br>
                ➔  <a class="primary-link" href="http://www.jtri.or.jp/counsel/index.php" target="_blank">http://www.jtri.or.jp/counsel/index.php</a><br>
                <br>
                {{ __('message.National Tax Public Tax Answer is guided as a 'common tax question' for each type of tax.') }} <br>
                ➔  <a class="primary-link" href="//www.nta.go.jp/taxes/shiraberu/taxanswer/index2.htm" target="_blank">www.nta.go.jp/taxes/shiraberu/taxanswer/index2.htm</a> <br>
                <br>
                Internal Revenue Service（{{ __('message.United States International Revenue Agency English') }} ）<br>
                ➔  <a class="primary-link" href="//www.irs.gov/" target="_blank">www.irs.gov/</a> <br>
            </p>
            <br>
            <p>
                <b>•{{ __('message.About final income tax return to lecturer activities in the side work') }} </b><br>
                {{ __('message.Generally, if your income other than salary income (income-necessary expenses) is less than 200,000 yen per year, you do not need to file a tax return. However, if you have side business income other than INIT, you need to determine whether they also exceed 200,000 yen.') }} 
                ➔  {{ __('message.Summary of National Tax Agency / Tax Answer / Category of income') }}  (<a class="primary-link" href="//www.nta.go.jp/taxes/shiraberu/taxanswer/shotoku/1300.htm" target="_blank">www.nta.go.jp/taxes/shiraberu/taxanswer/shotoku/1300.htm</a> )
            </p>
            <br>
            <p>
                <b>•{{ __('message.About declaration of consumption tax of income obtained in lecturer activity') }} </b><br>
                {{ __('message.Those who have been instructors for less than two years or who earned less than 10 million yen in the business two years ago are not considered to need to file a consumption tax, but please check the details of the business. Please.') }} 
                ➔  {{ __('message.National Tax Agency / Tax Answer / Consumption Tax') }}   (<a class="primary-link" href="https://www.nta.go.jp/taxes/shiraberu/taxanswer/shohi/shouhi.htm" target="_blank">https://www.nta.go.jp/taxes/shiraberu/taxanswer/shohi/shouhi.htm</a> )
            </p>
            <br>
            <p>
                <b>•{{ __('message.In-lecturer Fee's income and income declaration') }} </b><br>
                {{ __('message.Depending on your income situation, employment status, etc., the income type will be declared.') }} <br>
                ➔  {{ __('message.Summary of National Tax Agency / Tax Answer / Category of income') }}  (<a class="primary-link" href="//www.nta.go.jp/taxes/shiraberu/taxanswer/shotoku/1300.htm" target="_blank">www.nta.go.jp/taxes/shiraberu/taxanswer/shotoku/1300.htm</a> )
            </p>
            <br>
            <p>
                <b>•{{ __('message.Spouse deduction') }} </b><br>
                {{ __('message.For example, if you are a teacher while working as a housewife, you will be considered a deductible spouse if your total annual income is 380,000 yen or less. The method of calculating the total income (calculation of necessary expenses, etc.) also differs depending on the type of income.') }} <br>
                ➔  {{ __('message.National Tax Agency / Tax Answer / Spouse deduction') }}   (<a class="primary-link" href="//www.nta.go.jp/taxes/shiraberu/taxanswer/shotoku/1191.htm" target="_blank">www.nta.go.jp/taxes/shiraberu/taxanswer/shotoku/1191.htm</a> )
            </p>
            <br>
            <p>
                <b>•{{ __('message.Fixed declaration of salary income person') }} </b><br>
                {{ __('message.For example, if you are a salaryman and earn income as a side job, you will need to file a tax return depending on the amount of annual income other than salary (miscellaneous income / business income), and the upper limit will differ depending on the amount of annual salary. The method of calculating the total income (calculation of necessary expenses, etc.) also differs depending on the type of income.') }} <br>
                ➔  {{ __('message.Person who needs tax return in National Tax Agency / Tax Answer / Salaryman') }}   (<a class="primary-link" href="//www.nta.go.jp/taxes/shiraberu/taxanswer/shotoku/1900.htm" target="_blank">www.nta.go.jp/taxes/shiraberu/taxanswer/shotoku/1900.htm</a> )
            </p>
            <br>
            <p>
                <b>•{{ __('message.Report in case of overseas living') }} </b><br>
                {{ __('message.Tax payment obligations vary depending on whether they are judged to 'residents' and 'non-resident' from the number of days of stay at the residence and the real life of life.') }} <br>
                {{ __('message.If non-residents revenue in init with init, basically, tax duty in Japan will not occur and it will conform to the current tax law.') }} <br>
                {{ __('message.For example, if you live abroad in overseas travel and short-term study abroad, it is considered that non-residents will not be applicable, so it may be taxed in Japan.') }} <br>
                ➔  {{ __('message.National Tax Agency / Tax Answer / Resident and Non-Residents') }}   (<a class="primary-link" href="//www.nta.go.jp/taxes/shiraberu/taxanswer/gensen/2875.htm" target="_blank">www.nta.go.jp/taxes/shiraberu/taxanswer/gensen/2875.htm</a> )
            </p>
        </div>
    </section>
@endsection
