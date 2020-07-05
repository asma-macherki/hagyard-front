import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ElementPrecriptionItemsComponent } from './element-precription-items.component';

describe('ElementPrecriptionItemsComponent', () => {
  let component: ElementPrecriptionItemsComponent;
  let fixture: ComponentFixture<ElementPrecriptionItemsComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ElementPrecriptionItemsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ElementPrecriptionItemsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
