import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AddElementPrescriptionComponent } from './add-element-prescription.component';

describe('AddElementPrescriptionComponent', () => {
  let component: AddElementPrescriptionComponent;
  let fixture: ComponentFixture<AddElementPrescriptionComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AddElementPrescriptionComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AddElementPrescriptionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
