@extends('layout')



@section('content')
    
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container container-xxl">
								<!--begin::Card-->
								<div class="card">
										<!--begin::Card header-->
										<div class="card-header border-0 pt-6">
											<!--begin::Card title-->
											<div class="card-title">
												
											</div>
											<!--begin::Card title-->
											<!--begin::Card toolbar-->
											<div class="card-toolbar">
												<!--begin::Toolbar-->
												<div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
													<!--begin::Add customer-->
													<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer">Add Employee</button>
													<!--end::Add customer-->
												</div>
												<!--end::Toolbar-->
												<!--begin::Group actions-->
												<div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
													<div class="fw-bold me-5">
													<span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>
													<button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
												</div>
												<!--end::Group actions-->
											</div>
											<!--end::Card toolbar-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body pt-0">
											<!--begin::Table-->
											<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
												<!--begin::Table head-->
												<thead>
													<!--begin::Table row-->
													<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
														<th class="w-10px pe-2">
															<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
																<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_customers_table .form-check-input" value="1" />
															</div>
														</th>
														<th class="min-w-125px">Name (Code)</th>
														<th class="min-w-125px">Mobile</th>
														<th class="min-w-125px">Email</th>
														<th class="min-w-125px">Designation</th>
														<th class="min-w-125px">Created Date</th>
														<th class="text-end min-w-70px">Actions</th>
													</tr>
													<!--end::Table row-->
												</thead>
												<!--end::Table head-->
												<!--begin::Table body-->
												<tbody class="fw-semibold text-gray-600">
												@foreach ($employees as $employee)
													<tr>
														<!--begin::Checkbox-->
														<td>
															<div class="form-check form-check-sm form-check-custom form-check-solid">
																<input class="form-check-input employee_checkbox" type="checkbox" value="{{ $employee->id }}" data-id="{{ $employee->id }}" />
															</div>
														</td>
														<!--end::Checkbox-->
														<!--begin::Name=-->
														<td>
															<a href="#" class="text-gray-800 text-hover-primary mb-1">{{ $employee->fname }}  {{ $employee->lname }} ({{ $employee->code }})</a>
														</td>
														<!--end::Name=-->
														<!--begin::Mobile=-->
														<td>
															<a href="#" class="text-gray-600 text-hover-primary mb-1">{{ $employee->mobile }}</a>
														</td>
														<!--end::Mobile=-->
														<!--begin::Email=-->
														<td>
															<a href="#" class="text-gray-600 text-hover-primary mb-1">{{ $employee->email }}</a>
														</td>
														<!--begin::Email=-->
														<!--begin::Designation=-->
														<td>
															<a href="#" class="text-gray-600 text-hover-primary mb-1">{{ $employee->designation }}</a>
														</td>
														<!--end::Designation=-->
														<!--begin::Created Date=-->
														<td>
															<a href="#" class="text-gray-600 text-hover-primary mb-1">{{ $employee->created_at->format('d M Y') }}</a>
														</td>
														<!--end::Created Date=-->
														<!--begin::Action=-->
														<td class="text-end">
															<a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
															<span class="svg-icon svg-icon-5 m-0">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon--></a>
															<!--begin::Menu-->
															<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="employee/detail/{{$employee->id}}" class="menu-link px-3">View</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3" data-kt-customer-table-filter="delete_row" data-id="{{ $employee->id }}" >Delete</a>
																</div>
																<!--end::Menu item-->
															</div>
															<!--end::Menu-->
														</td>
														<!--end::Action=-->
													</tr>
													@endforeach	
												</tbody>
												<!--end::Table body-->
											</table>
											<!--end::Table-->
										</div>
										<!--end::Card body-->
									</div>
									<!--end::Card-->
								</div>
								<!--end::Content container-->
							</div>

							<!--begin::Modal - Customers - Add-->
									<div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
										<!--begin::Modal dialog-->
										<div class="modal-dialog modal-dialog-centered mw-650px">
											<!--begin::Modal content-->
											<div class="modal-content">
												<!--begin::Form-->
												<form class="form" action="{{ route('employee.store') }}" method="POST" data-kt-redirect="">
												@csrf
												<input type="hidden" id="action" name="action" value="addEmployee" />
													<!--begin::Modal header-->
													<div class="modal-header" id="kt_modal_add_customer_header">
														<!--begin::Modal title-->
														<h2 class="fw-bold">Add Employee</h2>
														<!--end::Modal title-->
														<!--begin::Close-->
														<div id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary">
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
															<span class="svg-icon svg-icon-1">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
																	<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
														</div>
														<!--end::Close-->
													</div>
													<!--end::Modal header-->
													<!--begin::Modal body-->
													<div class="modal-body py-10 px-lg-17">
														<!--begin::Scroll-->
														<div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="required fs-6 fw-semibold mb-2">First Name</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" class="form-control form-control-solid" id="fname" placeholder="" name="fname" value="" />
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="required fs-6 fw-semibold mb-2">Last Name</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" class="form-control form-control-solid" id="lname" placeholder="" name="lname" value="" />
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																	<!--begin::Wrapper-->
																	<div class="d-flex flex-stack">
																		<!--begin::Label-->
																		<div class="me-5">
																			<!--begin::Label-->
																			<label class="fs-6 fw-semibold">Gender</label>
																			<!--end::Label-->
																			<!--begin::Radio group-->
																			<div class="btn-group w-100 w-lg-50 ms-10" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
																				<!--begin::Radio-->
																				<label class="btn btn-outline btn-color-muted btn-active-primary active" data-kt-button="true">
																					<!--begin::Input-->
																					<input class="btn-check" type="radio" name="gender" id="gender" checked="checked" value="Male"/>
																					<!--end::Input-->
																					Male
																				</label>
																				<!--end::Radio-->
																				<!--begin::Radio-->
																				<label class="btn btn-outline btn-color-muted btn-active-danger " data-kt-button="true">
																					<!--begin::Input-->
																					<input class="btn-check" type="radio" name="gender" id="gender"  value="Female"/>
																					<!--end::Input-->
																					Female
																				</label>
																				<!--end::Radio-->
																			</div>
																			<!--end::Radio group-->
																		</div>
																		<!--end::Label-->
																		
																	</div>
																	<!--begin::Wrapper-->
																</div>
																<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="required fs-6 fw-semibold mb-2">Email</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="email" class="form-control form-control-solid" id="email" placeholder="" name="email" value="" />
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="required fs-6 fw-semibold mb-2">Mobile</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" class="form-control form-control-solid" id="mobile" placeholder="" name="mobile" value="" maxlength="10"/>
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="required fs-6 fw-semibold mb-2">Code</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" class="form-control form-control-solid" id="code" placeholder="" name="code" value="" maxlength="5" minlength="3"/>
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="fs-6 fw-semibold mb-2">Designation</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" class="form-control form-control-solid" id="designation" placeholder="" name="designation" value="" />
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="d-flex flex-column mb-7 fv-row">
																	<!--begin::Label-->
																	<label class="fs-6 fw-semibold mb-2">Address</label>
																	<!--end::Label-->
																	<!--begin::Input-->
																	<textarea class="form-control form-control-solid" id="address" name="address" rows="4" cols="50"></textarea>
																	<!--end::Input-->
																</div>
																<!--end::Input group-->
																
																
														</div>
														<!--end::Scroll-->
													</div>
													<!--end::Modal body-->
													<!--begin::Modal footer-->
													<div class="modal-footer flex-center">
														<!--begin::Button-->
														<button type="reset" id="kt_modal_add_customer_cancel" class="btn btn-light me-3">Discard</button>
														<!--end::Button-->
														<!--begin::Button-->
														<button type="submit" class="btn btn-primary">
															<span class="indicator-label">Submit</span>
															
														</button>
														<!--end::Button-->
													</div>
													<!--end::Modal footer-->
												</form>
												<!--end::Form-->
											</div>
										</div>
									</div>
							<!--end::Modal - Customers - Add-->
@endsection