@extends('layout')



@section('content')
						<!--begin::Content-->
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container container-xxl">
									<!--begin::Layout-->
									<div class="d-flex flex-column flex-xl-row">
										<!--begin::Sidebar-->
										<div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
											<!--begin::Card-->
											<div class="card mb-5 mb-xl-8">
												<!--begin::Card body-->
												<div class="card-body pt-15">
													<!--begin::Summary-->
													<div class="d-flex flex-center flex-column mb-5">
														<!--begin::Avatar-->
														<div class="symbol symbol-150px symbol-circle mb-7">
															<img src="{{ asset('assets/media/avatars/300-1.jpg')}}" alt="image" />
														</div>
														<!--end::Avatar-->
														<!--begin::Name-->
														<a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">{{$employee->fname}} {{$employee->lname}}</a>
														<!--end::Name-->
														<!--begin::Email-->
														<a href="#" class="fs-5 fw-semibold text-muted text-hover-primary mb-1">{{ $employee->email }}</a>
														<!--end::Email-->
														<!--begin::Mobile-->
														<a href="#" class="fs-5 fw-semibold text-muted text-hover-primary mb-1">{{ $employee->mobile }}</a>
														<!--end::Mobile-->
													</div>
													<!--end::Summary-->
													<!--begin::Details toggle-->
													<div class="d-flex flex-stack fs-4 py-3">
														<div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_customer_view_details" role="button" aria-expanded="false" aria-controls="kt_customer_view_details">Details
														<span class="ms-2 rotate-180">
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
															<span class="svg-icon svg-icon-3">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
														</span></div>
														<span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit Employee details">
															<a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer">Update employee details</a>
														</span>
													</div>
													<!--end::Details toggle-->
													<div class="separator separator-dashed my-3"></div>
													<!--begin::Details content-->
													<div id="kt_customer_view_details" class="collapse show">
														<div class="pb-5 fs-6">
															<div class="d-flex flex-wrap flex-center">
																<!--begin::Radio group-->
																	<div class="btn-group w-100" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
																		<!--begin::Radio-->
																			<label class="btn btn-outline btn-color-muted btn-active-primary {{ $employee->gender === 'Male' ? 'active' : '' }} " data-kt-button="true">
																				Male
																			</label>
																		<!--end::Radio-->
																		<!--begin::Radio-->
																			<label class="btn btn-outline btn-color-muted btn-active-danger {{ $employee->gender === 'Female' ? 'active' : '' }} " data-kt-button="true">
																				Female
																			</label>
																		<!--end::Radio-->
																	</div>
																<!--end::Radio group-->
															</div>								
															<!--begin::Details item-->
															<div class="fw-bold mt-5">Code</div>
															<div class="text-gray-600">{{$employee->code}}</div>
															<!--begin::Details item-->
															
															<!--begin::Details item-->
															<div class="fw-bold mt-5">Designation</div>
															<div class="text-gray-600">{{$employee->designation}}</div>
															<!--begin::Details item-->
															<!--begin::Details item-->
															<div class="fw-bold mt-5">DOB</div>
															<div class="text-gray-600">{{$employee->dob}}</div>
															<!--begin::Details item-->
															<!--begin::Details item-->
															<div class="fw-bold mt-5">Address</div>
															<div class="text-gray-600">{!! nl2br(e($employee->address)) !!}</div>
															<!--begin::Details item-->
														</div>
													</div>
													<!--end::Details content-->
												</div>
												<!--end::Card body-->
											</div>
											<!--end::Card-->
										</div>
										<!--end::Sidebar-->
										
									</div>
									<!--end::Layout-->
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
							<!--begin::Modal - Customers - Add-->
							<div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
										<!--begin::Modal dialog-->
										<div class="modal-dialog modal-dialog-centered mw-650px">
											<!--begin::Modal content-->
											<div class="modal-content">
												<!--begin::Form-->
												<form class="form" method="POST" action="{{route('employee.update', ['id'=>$employee->id])}}" id="kt_modal_add_customer_form" data-kt-redirect="">
													@csrf
												<input type="hidden" id="action" name="action" value="editEmployee" />
												<input type="hidden" id="employeeId" name="employeeId" value="{{$employee->id}}" />
													<!--begin::Modal header-->
													<div class="modal-header" id="kt_modal_add_customer_header">
														<!--begin::Modal title-->
														<h2 class="fw-bold">Edit Employee</h2>
														<!--end::Modal title-->
														<!--begin::Close-->
														<div data-dismiss="modal" id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
																<input type="text" class="form-control form-control-solid" id="fname" placeholder="" name="fname" value="{{$employee->fname}}" />
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="required fs-6 fw-semibold mb-2">Last Name</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" class="form-control form-control-solid" id="lname" placeholder="" name="lname" value="{{$employee->lname}}" />
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
																				<label class="btn btn-outline btn-color-muted btn-active-primary {{ $employee->gender === 'Male' ? 'active' : '' }} " data-kt-button="true">
																					<!--begin::Input-->
																					<input class="btn-check" type="radio" name="gender" id="gender" {{ $employee->gender === 'Male' ? 'checked="checked"' : '' }} value="Male"/>
																					<!--end::Input-->
																					Male
																				</label>
																				<!--end::Radio-->
																				<!--begin::Radio-->
																				<label class="btn btn-outline btn-color-muted btn-active-danger {{ $employee->gender === 'Female' ? 'active' : '' }} " data-kt-button="true">
																					<!--begin::Input-->
																					<input class="btn-check" type="radio" name="gender" id="gender" {{ $employee->gender === 'Female' ? 'checked="checked"' : '' }} value="Female"/>
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
																<input type="email" class="form-control form-control-solid" id="email" placeholder="" name="email" value="{{$employee->email}}" />
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="required fs-6 fw-semibold mb-2">Mobile</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" class="form-control form-control-solid" id="mobile" placeholder="" name="mobile" value="{{$employee->mobile}}" maxlength="10"/>
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="required fs-6 fw-semibold mb-2">Code</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" class="form-control form-control-solid" id="code" placeholder="" name="code" value="{{$employee->code}}" maxlength="5" minlength="3"/>
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="fs-6 fw-semibold mb-2">Designation</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" class="form-control form-control-solid" id="designation" placeholder="" name="designation" value="{{$employee->designation}}" />
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="d-flex flex-column mb-7 fv-row">
																	<!--begin::Label-->
																	<label class="fs-6 fw-semibold mb-2">Address</label>
																	<!--end::Label-->
																	<!--begin::Input-->
																	<textarea class="form-control form-control-solid" id="address" name="address" rows="4" cols="50">{{ $employee->address }}</textarea>
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
														<button type="button" id="kt_modal_add_customer_cancel" data-dismiss="modal" class="btn btn-light me-3">Discard</button>
														<!--end::Button-->
														<!--begin::Button-->
														<button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
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