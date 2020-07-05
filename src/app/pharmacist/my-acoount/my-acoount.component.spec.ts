import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MyAcoountComponent } from './my-acoount.component';

describe('MyAcoountComponent', () => {
  let component: MyAcoountComponent;
  let fixture: ComponentFixture<MyAcoountComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MyAcoountComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MyAcoountComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
