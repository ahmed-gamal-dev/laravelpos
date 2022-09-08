@extends('layouts.admin')
@section('title')
الحسابات
@endsection

@section('contentheader')
الحسابات المالية
@endsection

@section('contentheaderlink')
<a href="{{ route('admin.accounts.index') }}">  الحسابات المالية </a>
@endsection

@section('contentheaderactive')
عرض
@endsection



@section('content')


  
      <div class="card">
        <div class="card-header">
          <h3 class="card-title card_title_center">بيانات   الحسابات المالية </h3>
          <input type="hidden" id="token_search" value="{{csrf_token() }}">
          <input type="hidden" id="ajax_search_url" value="{{ route('admin.accounts.ajax_search') }}">
        
          <a href="{{ route('admin.accounts.create') }}" class="btn btn-sm btn-success" >اضافة جديد</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
          <div class="col-md-4">
            <input  type="radio" name="searchbyradio" id="searchbyradio" value="item_code"> برقم الحساب
            <input  type="radio" name="searchbyradio" id="searchbyradio" value="name"> بالاسم

            <input style="margin-top: 6px !important;" type="text" id="search_by_text" placeholder=" اسم  - رقم الحساب" class="form-control"> <br>
            
                      </div>
                     
                     
                          </div>
               <div class="clearfix"></div>

        <div id="ajax_responce_serarchDiv" class="col-md-12">
          
          @if (@isset($data) && !@empty($data))

          <table id="example2" class="table table-bordered table-hover">
            <thead class="custom_thead">
        
           <th>الاسم </th>
           <th> رقم الحساب </th>
           <th> النوع </th>
           <th>  هل أب </th>
           <th>  الحساب الاب </th>
           <th>  الرصيد </th>
           <th>حالة التفعيل</th>
          <th></th>

            </thead>
            <tbody>
         @foreach ($data as $info )
            <tr>
           
             <td>{{ $info->name }}</td>  
             <td>{{ $info->account_number }}</td>  
             <td>{{ $info->account_types_name }}</td>  
             <td>@if($info->is_parent==1) نعم  @else  لا @endif</td>  
             <td>{{ $info->parent_account_name }}</td>  
             <td></td>  

             <td>@if($info->is_archived==1) مفعل @else معطل @endif</td> 
      
         <td>

        <a href="{{ route('admin.accounts.edit',$info->id) }}" class="btn btn-sm  btn-primary">تعديل</a>   
        <a href="{{ route('admin.accounts.delete',$info->id) }}" class="btn btn-sm are_you_shue  btn-danger">حذف</a>   
        <a href="{{ route('admin.accounts.show',$info->id) }}" class="btn btn-sm   btn-info">عرض</a>   

         </td>
           
   
           </tr> 
     
         @endforeach
   
   
   
            </tbody>
             </table>
      <br>
           {{ $data->links() }}
       
           @else
           <div class="alert alert-danger">
             عفوا لاتوجد بيانات لعرضها !!
           </div>
                 @endif

        </div>
      
      
      
      </div>

        </div>
     
</div>





@endsection

@section('script')
<script src="{{ asset('assets/admin/js/inv_itemcard.js') }}"></script>

@endsection


