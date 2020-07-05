import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FooterPharmacistComponent } from './footer-pharmacist.component';

describe('FooterPharmacistComponent', () => {
  let component: FooterPharmacistComponent;
  let fixture: ComponentFixture<FooterPharmacistComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FooterPharmacistComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FooterPharmacistComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
