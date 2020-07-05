import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { EditPharmacistComponent } from './edit-pharmacist.component';

describe('EditPharmacistComponent', () => {
  let component: EditPharmacistComponent;
  let fixture: ComponentFixture<EditPharmacistComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ EditPharmacistComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(EditPharmacistComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
