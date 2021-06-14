import { ComponentFixture, TestBed } from '@angular/core/testing';

import { DetailsBusComponent } from './details-bus.component';

describe('DetailsBusComponent', () => {
  let component: DetailsBusComponent;
  let fixture: ComponentFixture<DetailsBusComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ DetailsBusComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(DetailsBusComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
