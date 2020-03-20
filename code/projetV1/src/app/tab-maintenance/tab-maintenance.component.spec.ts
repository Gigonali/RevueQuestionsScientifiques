import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TabMaintenanceComponent } from './tab-maintenance.component';

describe('TabMaintenanceComponent', () => {
  let component: TabMaintenanceComponent;
  let fixture: ComponentFixture<TabMaintenanceComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TabMaintenanceComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TabMaintenanceComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
